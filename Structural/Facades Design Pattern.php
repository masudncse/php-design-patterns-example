<?php
class FileSystem
{
    public function read($file)
    {
        // read file from disk
    }

    public function write($file, $content)
    {
        // write file to disk
    }
}

class Compression
{
    public function compress($file)
    {
        // compress file
    }

    public function decompress($file)
    {
        // decompress file
    }
}

class Encryption
{
    public function encrypt($file)
    {
        // encrypt file
    }

    public function decrypt($file)
    {
        // decrypt file
    }
}

class FileManager
{
    private $fileSystem;
    private $compression;
    private $encryption;

    public function __construct()
    {
        $this->fileSystem = new FileSystem();
        $this->compression = new Compression();
        $this->encryption = new Encryption();
    }

    public function read($file)
    {
        return $this->fileSystem->read($file);
    }

    public function write($file, $content)
    {
        return $this->fileSystem->write($file, $content);
    }

    public function compress($file)
    {
        return $this->compression->compress($file);
    }

    public function decompress($file)
    {
        return $this->compression->decompress($file);
    }

    public function encrypt($file)
    {
        return $this->encryption->encrypt($file);
    }

    public function decrypt($file)
    {
        return $this->encryption->decrypt($file);
    }
}

$fileManager = new FileManager();
$fileManager->write("file.txt", "Hello, world!");
$fileManager->compress("file.txt");
$fileManager->encrypt("file.txt");
