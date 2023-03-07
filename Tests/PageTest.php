<?php

namespace Tests;

class PageTest extends Test
{
    public function testIndex(): PageTest
    {
        $info = $this->get("nginx");

        if ($info['http_code'] == 200) {
            echo $this->getMsgSuccess(__METHOD__);
        } else {
            echo $this->getMsgFail(__METHOD__);
        }

        return $this;
    }

    public function testShow(): PageTest
    {
        $info = $this->get("nginx/?route=show&page=1");

        if ($info['http_code'] == 200) {
            echo $this->getMsgSuccess(__METHOD__);
        } else {
            echo $this->getMsgFail(__METHOD__);
        }

        return $this;
    }

    public function testShow404(): PageTest
    {
        $info = $this->get("nginx/?route=show&page=");

        if ($info['http_code'] == 404) {
            echo $this->getMsgSuccess(__METHOD__);
        } else {
            echo $this->getMsgFail(__METHOD__);
        }

        return $this;
    }
}