<?php declare(strict_types=1);

use Swoole\Coroutine;
use Swoole\Coroutine\Channel;

/**
 * Class ExtDocsGenerator
 *
 * ExtensionDocument, ExtDocsGenerator
 * ExtDocDumper, ExtDocExporter
 * ExtStubExporter
 *
 * @noinspection AutoloadingIssuesInspection
 */
class ExtStubExporter
{
    public const METHOD   = 1;
    public const PROPERTY = 2;
    public const CONSTANT = 3;

    public const SPACE4 = '    ';
    public const SPACE5 = '     ';

    public static $phpKeywords = [
        // 'exit',
        'die',
        'echo',
        'class',
        'interface',
        'function',
        'public',
        'protected',
        'private'
    ];

    /**
     * @var string
     */
    private $extName;

    /**
     * @var string
     */
    public $outDir;

    /**
     * @var string
     */
    public $lang = 'zh-CN';

    /**
     * @var string
     */
    public $confDir;

    /**
     * @var string
     */
    private $version;

    /**
     * @var ReflectionExtension
     */
    private $rftExt;

    /**
     * @var array
     */
    private $stats = [
        'class'    => 0,
        'method'   => 0,
        'function' => 0,
        'constant' => 0,
    ];

    /**
     * @var array Short alias class.
     */
    private $shortAliases = [];

    /**
     * @param string $word
     *
     * @return bool
     */
    public static function isPHPKeyword(string $word): bool
    {
        return in_array($word, self::$phpKeywords, true);
    }

    /**
     * @param string $comment
     *
     * @return string
     */
    public static function formatComment(string $comment): string
    {
        $lines = explode("\n", $comment);

        foreach ($lines as &$li) {
            $li = ltrim($li);
            if (isset($li[0]) && $li[0] !== '*') {
                $li = self::SPACE5 . '*' . $li;
            } else {
                $li = self::SPACE5 . $li;
            }
        }

        return implode("\n", $lines) . "\n";
    }

    /**
     * @param string $className
     */
    public function exportShortAlias(string $className): void
    {
        $ns = explode('\\', $className);
        foreach ($ns as $k => $n) {
            $ns[$k] = ucfirst($n);
        }

        $namespace   = implode('\\', array_slice($ns, 0, count($ns) - 1));
        $parentClass = str_replace('Co\\', 'Swoole\\Coroutine\\', ucwords($className, "\\"));

        // $classTpl = "namespace %s \n{\n" . self::SPACE5 . "class %s extends \%s {}\n}\n";
        $classTpl = self::SPACE4 . "class %s extends \%s{}";
        $content  = sprintf($classTpl, end($ns), $parentClass);

        $this->shortAliases[$namespace][] = $content;
    }

    public static function getNamespaceAlias(string $className)
    {
        $lowerName = strtolower($className);
        if ($lowerName === 'co') {
            return Coroutine::class;
        }

        if ($lowerName === 'chan') {
            return Channel::class;
        }

        if ($lowerName === 'swoole_websocket_closeframe') {
            return 'Swoole\\Websocket\\CloseFrame';
        }

        return str_replace('_', '\\', ucwords($className, '_'));
    }

    /**
     * @param string $class
     * @param string $name
     * @param int    $type
     *
     * @return array|mixed
     */
    public function getConfig(string $class, string $name, int $type)
    {
        switch ($type) {
            case self::CONSTANT:
                $dir = 'constant';
                break;
            case self::METHOD:
                $dir = 'method';
                break;
            case self::PROPERTY:
                $dir = 'property';
                break;
            default:
                return false;
        }

        $file = $this->confDir . '/' . $this->lang . '/' . strtolower($class) . '/' . $dir . '/' . $name . '.php';

        if (is_file($file)) {
            return include $file;
        }

        return [];
    }

    /**
     * @return string
     */
    private function getGlobalConstants(): string
    {
        $defines = '';
        foreach ($this->rftExt->getConstants() as $name => $value) {
            if (!is_numeric($value)) {
                $value = "'$value'";
            }

            $this->stats['constant']++;
            $defines .= "define('$name', $value);\n";
        }

        return $defines;
    }

    public function getFunctionsDef(): string
    {
        $all = '';
        /** @var $v ReflectionFunction */
        foreach ($this->rftExt->getFunctions() as $name => $v) {
            $comment = '';
            $fnArgs  = [];
            $this->stats['function']++;

            if ($params = $v->getParameters()) {
                $comment = "/**\n";
                foreach ($params as $k1 => $p) {
                    $pName = $p->name;
                    $pType = $this->getParameterType($p, $pName);

                    $comment .= sprintf(' * @param %s$%s', $pType, $pName) . "\n";
                    $canType = $pType && $pType !== 'mixed ';

                    if ($p->isOptional()) {
                        $fnArgs[] = sprintf('%s$%s = null', $canType ? $pType : '', $pName);
                    } else {
                        $fnArgs[] = ($canType ? $pType : '') . '$' . $pName;
                    }
                }

                $comment .= " * @return mixed\n";
                $comment .= " */\n";
            }
            $comment .= sprintf("function %s(%s){}\n\n", $name, implode(', ', $fnArgs));

            $all .= $comment;
        }

        return $all;
    }

    /**
     * @param string $classname
     * @param array $props
     *
     * @return string
     */
    public function getPropertyDef(string $classname, array $props): string
    {
        if (!$props) {
            return '';
        }

        $propStr = self::SPACE4 . "// property of the class $classname\n";

        /** @var $v ReflectionProperty */
        foreach ($props as $k => $v) {
            $modifiers = implode(' ', Reflection::getModifierNames($v->getModifiers()));
            $propStr   .= self::SPACE4 . "{$modifiers} $" . $v->name . ";\n";
        }

        return $propStr;
    }

    /**
     * @param string $classname
     * @param array  $consts
     *
     * @return string
     */
    public function getConstantsDef(string $classname, array $consts): string
    {
        if (!$consts) {
            return '';
        }

        $all = self::SPACE4 . "// constants of the class $classname\n";
        $sp4 = self::SPACE4;

        foreach ($consts as $k => $v) {
            $all .= "{$sp4}public const {$k} = ";
            if (is_int($v)) {
                $all .= "{$v};\n";
            } else {
                $all .= "'{$v}';\n";
            }
        }

        return $all;
    }

    /**
     * @param string $classname
     * @param array  $methods
     *
     * @return string
     */
    public function getMethodsDef(string $classname, array $methods): string
    {
        // var_dump("getMethodsDef: " . $classname);
        $all = [];
        $sp4 = self::SPACE4;
        $tpl = "$sp4%s function %s(%s){}";

        /**
         * @var string           $k The method name
         * @var ReflectionMethod $m
         */
        foreach ($methods as $k => $m) {
            if ($m->isFinal() || $m->isDestructor()) {
                continue;
            }

            $this->stats['method']++;
            $methodName = $m->name;
            $methodKey  = "{$classname}:$methodName";
            if (self::isPHPKeyword($methodName)) {
                $methodName = '_' . $methodName;
            }

            $arguments = [];
            $comment   = "$sp4/**\n";

            $config = $this->getConfig($classname, $methodName, self::METHOD);
            if (!empty($config['comment'])) {
                $comment .= self::formatComment($config['comment']);
            }

            if ($params = $m->getParameters()) {
                foreach ($params as $k1 => $p) {
                    $pName = $p->name;
                    $pType = $this->getParameterType($p, $pName, $methodKey);

                    $comment .= sprintf('%s * @param %s$%s', $sp4, $pType, $pName) . "\n";
                    $canType = $pType && $pType !== 'mixed ';

                    if ($p->isOptional()) {
                        // var_dump('--------' . $methodName . ':' . $pName);
                        // if ($p->isDefaultValueAvailable()) {
                        //     var_dump($p->getDefaultValue());
                        // }
                        $arguments[] = sprintf('%s$%s = null', ($canType ? $pType : ''), $pName);
                    } else {
                        $arguments[] = ($canType ? $pType : '') . '$' . $pName;
                    }
                }
            }

            if (isset(ArgTypes::$returnTypes[$methodKey])) {
                $returnType = ArgTypes::$returnTypes[$methodKey];
                $comment    .= self::SPACE5 . "* @return {$returnType}\n";
            } elseif (!isset($config['return'])) {
                $comment .= self::SPACE5 . "* @return mixed\n";
            } elseif (!empty($config['return'])) {
                $comment .= self::SPACE5 . "* @return {$config['return']}\n";
            }

            $comment   .= "$sp4 */\n";
            $modifiers = implode(' ', Reflection::getModifierNames($m->getModifiers()));
            $comment   .= sprintf($tpl, $modifiers, $methodName, implode(', ', $arguments));

            $all[] = $comment;
        }

        return implode("\n\n", $all);
    }

    /**
     * @param string          $classname
     * @param ReflectionClass $ref
     */
    public function exportNamespaceClass(string $classname, $ref): void
    {
        $arr = explode('\\', $classname);
        if (strtolower($arr[0]) !== $this->extName) {
            return;
        }

        array_walk($arr, function (&$v) {
            $v = ucfirst($v);
        });

        $path = $this->outDir . '/namespace/' . implode('/', array_slice($arr, 1));

        // namespace
        $ns   = implode('\\', array_slice($arr, 0, -1));
        $dir  = dirname($path);
        $name = basename($path);

        // var_dump($classname . '-'. $name);
        $this->stats['class']++;
        // create dir
        $this->createDir($dir);
        // var_dump($classname);

        $content = "namespace {$ns};\n\n" . $this->getClassDef($name, $ref);
        $this->writePhpFile($path . '.php', $content);
    }

    /**
     * @param string          $classname
     * @param ReflectionClass $ref
     *
     * @return string
     */
    public function getClassDef(string $classname, $ref): string
    {
        // 获取属性定义
        $props = $this->getPropertyDef($classname, $ref->getProperties());
        // 获取常量定义
        $consts = $this->getConstantsDef($classname, $ref->getConstants());
        // 获取方法定义
        $mdefs = $this->getMethodsDef($classname, $ref->getMethods());

        $classLine = $classname;
        if ($ref->getParentClass()) {
            $classLine .= ' extends \\' . $ref->getParentClass()->name;
        }

        $classTpl = "/**\n * @since %s\n */\n%s %s\n{\n%s\n%s\n%s\n}\n";
        $modifier = $ref->isInterface() ? 'interface' : 'class';

        return sprintf($classTpl, $this->version, $modifier, $classLine, $consts, $props, $mdefs);
    }

    /**
     * @param ReflectionParameter $p
     * @param string              $name
     * @param string              $mdKey method key
     *
     * @return string
     */
    private function getParameterType(ReflectionParameter $p, string $name, string $mdKey = ''): string
    {
        // has type
        if ($pt = $p->getType()) {
            $name = $pt->getName();
            if ($name === 'swoole_process') {
                $name = Swoole\Process::class;
            }

            // is class
            if (strpos($name, '\\') > 0) {
                $name = '\\' . $name;
            }

            return $name . ' ';
        }

        if ($mdKey && isset(ArgTypes::$special[$mdKey][$name])) {
            return ArgTypes::$special[$mdKey][$name] . ' ';
        }

        if (in_array($name, ArgTypes::INT, true)) {
            return 'int ';
        }

        if (in_array($name, ArgTypes::STRING, true)) {
            return 'string ';
        }

        if (in_array($name, ArgTypes::FLOAT, true)) {
            return 'float ';
        }

        if (in_array($name, ArgTypes::BOOL, true)) {
            return 'bool ';
        }

        if (in_array($name, ArgTypes::ARRAY, true)) {
            return 'array ';
        }

        if (in_array($name, ArgTypes::MIXED, true)) {
            return 'mixed ';
        }

        return '';
    }

    /**
     * 支持层级目录的创建
     *
     * @param string     $path
     * @param int|string $mode
     * @param bool       $recursive
     *
     * @return bool
     */
    public function createDir(string $path, int $mode = 0775, bool $recursive = true): bool
    {
        return (is_dir($path) || !(!@mkdir($path, $mode, $recursive) && !is_dir($path))) && is_writable($path);
    }

    /**
     * Class constructor.
     *
     * @throws ReflectionException
     */
    public function __construct()
    {
        $this->extName = 'swoole';

        if (!extension_loaded($this->extName)) {
            throw new RuntimeException("no '{$this->extName}' extension.");
        }

        $this->rftExt  = new ReflectionExtension($this->extName);
        $this->version = $this->rftExt->getVersion();
    }

    /**
     * @param string $outDir
     */
    public function export(string $outDir = ''): void
    {
        $this->outDir = $outDir = $outDir ?: dirname(__DIR__) . '/output';
        if (file_exists($outDir)) {
            $this->println(' - Clear old files ...');
            exec("rm -rf {$outDir}");
        }

        // create output directory
        $this->createDir($outDir);
        $this->println(' - Parse and export constants');

        // Get all the global constants
        $defines = $this->getGlobalConstants();
        $this->writePhpFile($outDir . '/constants.php', $defines);
        $this->println(' - Parse and export functions');

        // Get all functions defines
        $funcCodes = $this->getFunctionsDef();
        $this->writePhpFile($outDir . '/functions.php', $funcCodes);

        // Get all classes defines
        $this->println(' - Parse and export classes');
        $classes  = '';
        $aliasTpl = "\nclass %s extends %s{}\n";

        /**
         * @var string          $className
         * @var ReflectionClass $ref
         */
        foreach ($this->rftExt->getClasses() as $className => $ref) {
            // 短命名别名
            if (stripos($className, 'co\\') === 0) {
                $this->exportShortAlias($className);
                // 标准命名空间的类名，如 Swoole\Server
            } elseif (false !== strpos($className, '\\')) {
                $this->exportNamespaceClass($className, $ref);
                // 下划线分割类别名
            } else {
                $classes .= sprintf($aliasTpl, $className, self::getNamespaceAlias($className));
            }
        }

        $this->writePhpFile($outDir . '/classes.php', $classes);

        $shortAliases  = '';
        $shortClassTpl = "namespace %s\n{\n%s\n}\n\n";
        foreach ($this->shortAliases as $np => $aliases) {
            $shortAliases .= sprintf($shortClassTpl, $np, implode("\n", $aliases));
        }

        $this->writePhpFile($outDir . '/aliases.php', $shortAliases);
    }

    /**
     * @param string $filepath
     * @param string $content
     */
    private function writePhpFile(string $filepath, string $content): void
    {
        file_put_contents($filepath, "<?php\n\n" . $content);
    }

    /**
     * @param mixed ...$args The args allow int, string
     */
    private function println(...$args): void
    {
        echo implode(' ', $args), "\n";
    }

    /**
     * @return array
     */
    public function getStats(): array
    {
        return $this->stats;
    }

    /**
     * @return string
     */
    public function getExtName(): string
    {
        return $this->extName;
    }
}
