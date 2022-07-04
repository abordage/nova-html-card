<?php

namespace Abordage\HtmlCard\Console;

use Illuminate\Console\GeneratorCommand;
use Illuminate\Support\Str;

class CardCommand extends GeneratorCommand
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'nova-html-card {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new html card';

    protected function buildClass($name)
    {
        $stub = parent::buildClass($name);

        /** @var string $name */
        $name = $this->argument('name');
        /** @var string $key */
        $key = preg_replace('/[^a-zA-Z\d]+/', '', $name);

        return str_replace('uri-key', Str::kebab($key), $stub);
    }

    /**
     * Get the stub file for the generator.
     *
     * @return string
     */
    protected function getStub(): string
    {
        return __DIR__ . '/Card.stub';
    }

    /**
     * Get the default namespace for the class.
     *
     * @param string $rootNamespace
     * @return string
     */
    protected function getDefaultNamespace($rootNamespace): string
    {
        return $rootNamespace . '\Nova\Cards';
    }
}
