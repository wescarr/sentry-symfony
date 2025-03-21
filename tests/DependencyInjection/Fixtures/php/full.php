<?php

declare(strict_types=1);

use Symfony\Component\DependencyInjection\ContainerBuilder;

/** @var ContainerBuilder $container */
$container->loadFromExtension('sentry', [
    'dsn' => 'https://examplePublicKey@o0.ingest.sentry.io/0',
    'transport_factory' => 'App\\Sentry\\Transport\\TransportFactory',
    'logger' => 'app.logger',
    'options' => [
        'integrations' => ['App\\Sentry\\Integration\\FooIntegration'],
        'default_integrations' => false,
        'send_attempts' => 1,
        'prefixes' => ['%kernel.project_dir%'],
        'sample_rate' => 1,
        'traces_sample_rate' => 1,
        'traces_sampler' => 'App\\Sentry\\Tracing\\TracesSampler',
        'attach_stacktrace' => true,
        'context_lines' => 0,
        'enable_compression' => true,
        'environment' => 'development',
        'logger' => 'php',
        'release' => '4.0.x-dev',
        'server_name' => 'localhost',
        'before_send' => 'App\\Sentry\\BeforeSendCallback',
        'tags' => [
            'context' => 'development',
        ],
        'error_types' => \E_ALL,
        'max_breadcrumbs' => 1,
        'before_breadcrumb' => 'App\\Sentry\\BeforeBreadcrumbCallback',
        'in_app_exclude' => ['%kernel.cache_dir%'],
        'in_app_include' => ['%kernel.project_dir%'],
        'send_default_pii' => true,
        'max_value_length' => 255,
        'http_proxy' => 'proxy.example.com:8080',
        'http_timeout' => 10,
        'http_connect_timeout' => 15,
        'capture_silenced_errors' => true,
        'max_request_body_size' => 'none',
        'class_serializers' => ['App\\FooClass' => 'App\\Sentry\\Serializer\\FooClassSerializer'],
    ],
    'messenger' => [
        'enabled' => true,
        'capture_soft_fails' => false,
    ],
    'tracing' => [
        'dbal' => [
            'enabled' => false,
            'connections' => ['default'],
        ],
        'twig' => [
            'enabled' => false,
        ],
        'cache' => [
            'enabled' => false,
        ],
        'console' => [
            'excluded_commands' => ['app:command'],
        ],
    ],
]);
