<?php

namespace ZepSDK;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class ZepSDKServiceProvider extends PackageServiceProvider {

	public function configurePackage(Package $package) : void {

		$package->name('zep-sdk')
		        ->hasConfigFile('zep');
	}

}
