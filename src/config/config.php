<?php
/**
 * Part of the StandCi package.
 *
 * Licensed under MIT License.
 *
 * @package    StandCi
 * @version    2.0.0
 * @author     Ngmy <y.nagamiya@gmail.com>
 * @license    http://opensource.org/licenses/MIT MIT License
 * @copyright  (c) 2015, Ngmy <y.nagamiya@gmail.com>
 * @link       https://github.com/ngmy/stand-ci
 */

return array(

	'publish_routes' => true,

	/*
	|--------------------------------------------------------------------------
	| Route Prefix
	|--------------------------------------------------------------------------
	|
	| Here you may set the prefix of the route.
	| 'http://your.laravel.application/stand-ci/'
	|
	*/

	'route_prefix' => 'stand-ci',

	/*
	|--------------------------------------------------------------------------
	| Max Builds
	|--------------------------------------------------------------------------
	|
	| Here you may set the maximum number of builds to keep.
	| If the number of build has exceeded the specified number, it will be
	| deleted from the oldest build.
	|
	*/

	'max_builds' => 20,

	/*
	|--------------------------------------------------------------------------
	| Build Tasks
	|--------------------------------------------------------------------------
	|
	| Here you may set the tasks of the build.
	|
	*/

	'tasks' => array(

		'phpunit' => array(

			'strategy' => '\Ngmy\StandCi\Service\Task\PhpUnitTaskStrategy',

			'failonerror' => true,

			'executable' => base_path('vendor/bin/phpunit'),

			'extra_args' => '--configuration '.config_path('packages/ngmy/stand-ci/phpunit.xml.dist'),

		),

		'phpcs' => array(

			'strategy' => '\Ngmy\StandCi\Service\Task\PhpCodeSnifferTaskStrategy',

			'failonerror' => false,

			'executable' => base_path('vendor/bin/phpcs'),

			'extra_args' => '--standard=PSR1',

		),

		'phpdoc' => array(

			'strategy' => '\Ngmy\StandCi\Service\Task\PhpDocumentorTaskStrategy',

			'failonerror' => false,

			'executable' => base_path('vendor/bin/phpdoc'),

			'extra_args' => '',

		),

		'phpmd' => array(

			'strategy' => '\Ngmy\StandCi\Service\Task\PhpMessDetectorTaskStrategy',

			'failonerror' => false,

			'executable' => base_path('vendor/bin/phpmd'),

			'extra_args' => '',

		),

		'phpcpd' => array(

			'strategy' => '\Ngmy\StandCi\Service\Task\PhpCopyPasteDetectorTaskStrategy',

			'failonerror' => false,

			'executable' => base_path('vendor/bin/phpcpd'),

			'extra_args' => '',

		),

		'phpmetrics' => array(

			'strategy' => '\Ngmy\StandCi\Service\Task\PhpMetricsTaskStrategy',

			'failonerror' => false,

			'executable' => base_path('vendor/bin/phpmetrics'),

			'extra_args' => '',

		),

		'phpcb' => array(

			'strategy' => '\Ngmy\StandCi\Service\Task\PhpCodeBrowserTaskStrategy',

			'failonerror' => false,

			'executable' => base_path('vendor/bin/phpcb'),

			'extra_args' => '',

		),

	),

);
