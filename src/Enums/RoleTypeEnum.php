<?php

namespace ZepSDK\Enums;

use Illuminate\Validation\Rules\Enum;

final class RoleTypeEnum extends Enum {

	const NO_ROLE = 'norole';
	const SYSTEM = 'system';
	const ASSISTANT = 'assistant';
	const USER = 'user';
	const FUNCTION = 'function';
	const TOOL = 'tool';


	const LIST = [
		self::NO_ROLE,
		self::SYSTEM,
		self::ASSISTANT,
		self::USER,
		self::FUNCTION,
		self::TOOL,
	];
}
