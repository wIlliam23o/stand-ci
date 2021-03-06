<?php namespace Ngmy\StandCi\Service\Task;
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

use Illuminate\Support\Facades\File;

class PhpCodeBrowserTaskStrategy implements TaskStrategyInterface {

	protected $outputDir;

	protected $failOnError;

	protected $executable;

	protected $extraArgs;

	public function outputDir($outputDir)
	{
		$this->outputDir = $outputDir;

		return $this;
	}

	public function failOnError($failOnError)
	{
		$this->failOnError = $failOnError;

		return $this;
	}

	public function executable($executable)
	{
		$this->executable = $executable;

		return $this;
	}

	public function extraArgs($extraArgs)
	{
		$this->extraArgs = $extraArgs;

		return $this;
	}

	public function process()
	{
		if (!File::exists($this->outputDir.'/logs')) {
			File::makeDirectory($this->outputDir.'/logs');
		}

		$commands[] = 'cd '.base_path();
		$commands[] = $this->executable.' '.$this->extraArgs.' --log '.$this->outputDir.'/logs --source app --output '.$this->outputDir.'/phpcb';

		$command = implode(';', $commands);

		system($command, $status);

		if ($this->failOnError) {
			return $status;
		} else {
			return 0;
		}
	}

	public function output()
	{
	}

	public function outputOverview()
	{
	}

}
