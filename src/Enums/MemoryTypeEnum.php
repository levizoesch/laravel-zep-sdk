<?php

namespace ZepSDK\Enums;

use Illuminate\Validation\Rules\Enum;

final class MemoryTypeEnum extends Enum {

	const PERPETUAL = 'perpetual';

	const SUMMARY_RETRIEVER = 'summary_retriever';

	const MESSAGE_WINDOW = 'message_window';

	const LIST = [
		self::PERPETUAL,
		self::SUMMARY_RETRIEVER,
		self::MESSAGE_WINDOW,
	];
}
