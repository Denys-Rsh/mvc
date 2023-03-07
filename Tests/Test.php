<?php

namespace Tests;

class Test
{
    public function get(string $url): array
    {
        $curlHandler = curl_init($url);

        curl_setopt($curlHandler, CURLOPT_RETURNTRANSFER, true);
        curl_exec($curlHandler);

        $curlInfo = curl_getinfo($curlHandler);

        curl_close($curlHandler);

        return $curlInfo;
    }

    public function getMsgSuccess(string $methodName): string
    {
        return $this->getMsg($methodName, "Success!");
    }

    public function getMsgFail(string $methodName): string
    {
        return $this->getMsg($methodName, "Fail!");
    }

    public function getMsg(string $methodName, string $msg): string
    {
        return sprintf("%s: %s\n", $methodName, $msg);
    }
}