<?php

namespace DockerAutoloadProject;

class JSONProcessor
{
    public function read($filepath)
    {
        $jsoString = file_get_contents($filepath);
        return json_decode($jsoString, true);
    }
}
