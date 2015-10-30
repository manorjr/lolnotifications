<?php

namespace Lolnot\Application;

// value object
interface Message
{
    public function to();
    public function from();
    public function subject();
    public function body();
}