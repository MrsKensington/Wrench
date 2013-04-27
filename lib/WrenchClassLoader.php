<?php

/**
 * WrenchClassLoader implementation that loads classes for Wrench in php 5.1
 */
class WrenchClassLoader
{
    private $_fileExtension = '.php';
    private $_includePath;
    private $_namespaceSeparator = '\\';

    /**
     * Creates a new <tt>WrenchClassLoader</tt> that loads classes
     */
    public function __construct($includePath = null)
    {
        if(isset($includePath)) {
            $this->_includePath = $includePath;
        }
        else {
            $includePaths = explode(":", ini_get("include_path"));
            $this->_includePath = $includePaths[1]."/";
        }
    }

    /**
     * Sets the base include path for all class files in the namespace of this class loader.
     * 
     * @param string $includePath
     */
    public function setIncludePath($includePath)
    {
        $this->_includePath = $includePath;
    }

    /**
     * Gets the base include path for all class files in the namespace of this class loader.
     *
     * @return string $includePath
     */
    public function getIncludePath()
    {
        return $this->_includePath;
    }

    /**
     * Sets the file extension of class files in the namespace of this class loader.
     * 
     * @param string $fileExtension
     */
    public function setFileExtension($fileExtension)
    {
        $this->_fileExtension = $fileExtension;
    }

    /**
     * Gets the file extension of class files in the namespace of this class loader.
     *
     * @return string $fileExtension
     */
    public function getFileExtension()
    {
        return $this->_fileExtension;
    }

    /**
     * Installs this class loader on the SPL autoload stack.
     */
    public function register()
    {
        spl_autoload_register(array($this, 'loadClass'));
    }

    /**
     * Uninstalls this class loader from the SPL autoloader stack.
     */
    public function unregister()
    {
        spl_autoload_unregister(array($this, 'loadClass'));
    }

    /**
     * Loads the given class or interface.
     *
     * @param string $className The name of the class to load.
     * @return void
     */
    public function loadClass($className)
    {
        $dirs = Array(
            "/Wrench/",
            "/Wrench/Application/",
            "/Wrench/Frame/",
            "/Wrench/Payload/",
            "/Wrench/Util/",
            "/Wrench/Exception/",
            "/Wrench/Listener/",
            "/Wrench/Protocol/",
            "/Wrench/Socket/"
        );

        foreach($dirs as $dir){
            $file = "{$this->_includePath}{$dir}{$className}.php";
            if(file_exists($file)){
                require_once($file);
                return;
            }
        }
    }
}
