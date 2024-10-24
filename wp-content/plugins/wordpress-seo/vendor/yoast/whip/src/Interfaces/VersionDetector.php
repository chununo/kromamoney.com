<?php

namespace Yoast\WHIPv2\Interfaces;

/**
 * An interface that represents a version detector and message.
 */
interface VersionDetector {

	/**
	 * Detects the version of the installed software.
	 *
	 * @return string
	 */
	public function detect();

	/**
	 * Returns the message that should be shown if a version is not deemed appropriate by the implementation.
	 *
	 * @return string
	 */
	public function getMessage();
}
