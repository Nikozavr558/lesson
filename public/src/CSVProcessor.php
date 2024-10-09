<?php

namespace DockerAutoloadProject;

class CSVProcessor
{
    public function read($filepath)
    {
        $data = [];
        if (($handle = fopen($filepath, 'r')) !== FALSE) {
            while (($row = fgetcsv($handle, 1000, ',')) !== FALSE) {
                $data[] = $row;
            }
            fclose($handle);
        }
        return $data;
    }
}










