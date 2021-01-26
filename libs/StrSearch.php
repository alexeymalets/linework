<?php

class StrSearch
{

    public $type;

    public $filename;

    public $sting;

    public function __construct($type, $filename, $str)
    {
        $this->type = $type;
        $this->filename = $filename;
        $this->sting = $str;
    }

    public function find()
    {
        $yaml = yaml_parse_file('config.yaml');

        if(in_array(mime_content_type($this->filename), $yaml['mime_type']) && filesize($this->filename) < $yaml['size'])
        {
            switch ($this->type) {

                case 'hash':
                    $this->hash($this->filename, $this->sting);
                    break;

                case 'sting':
                    $this->str($this->filename, $this->sting);
                    break;

                default:
                    echo "Sorry, I do not know this type of search.\n";
                    break;
            };
        }else{
            echo "Sorry, file format is not suitable.\n";
        }
    }

    public function str($filename, $str)
    {
        $i = 1;

        $file = fopen( $filename, 'r');

        while(!feof($file)) {
            $line = strpos(fgets($file), $str);

            if($line !== false)
            {
                echo 'Line - ' . $i . "; Position  - " . $line . ";\n";
            }

            $i++;
        }

        fclose($file);
    }

    public function hash($filename, $str)
    {

        if(hash_equals(hash_file('md5', $filename), $str))
        {
            echo  'true' . "\n";

        }else{

            echo  'false' . "\n";

        }
    }

}