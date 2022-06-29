<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Email extends Model
{
    private string $to;
    private string $content;
    private string|null $name;
    private string|null $mobile;
    private string|null $cc;

    public function __construct(string $to, string $content, string $name = null, string $mobile = null)
    {
        $this->name = $name;
        $this->mobile = $mobile;
        $this->to = $to;
        $this->content = $content;
    }
}
