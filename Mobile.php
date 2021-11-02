<?php
	class Mobile{
		public $ID;
		public $Model;
		public $BrandID;
		public $Price;
		public $ReleaseDate;
		public $DiscountRate;
		public $ImageUrl;
		
		//specs
		public $MainCameraSpecs;
		public $MainCameraFeatures;
		public $FrontCameraSpecs;
		public $FrontCameraFeatures;
		public $DisplaySpecs;
		public $MemorySpecs;
		public $NetworkSpecs;
		public $PlatformID;
		public $StorageID;
		public $CPU;
		public $Features;
		public $BatterySpecs;

		//sccores
		public $PerformanceScore;
		public $MainCameraScore;
		public $FrontCameraScore;
		public $DisplayScore;
		public $BatteryLifeScore;
		
		function __construct($id, $model, $brandID, $price, $releaseDate, $discountRate,
				$imageUrl, $mainCameraSpecs, $mainCameraFeatures, $frontCameraSpecs, 
				$frontCameraFeatures, $displaySpecs, $memorySpecs, $networkSpecs, 
				$platformID, $storageID, $cpu, $features, $batterySpecs, $performanceScore, 
				$mainCameraScore, $frontCameraScore, $displayScore, $batteryLifeScore){
			$this->ID = $id;
			$this->Model = $model;
			$this->BrandID = $brandID;
			$this->Price = $price;
			$this->ReleaseDate = $releaseDate;
			$this->DiscountRate = $discountRate;
			$this->ImageUrl = $imageUrl;
			$this->MainCameraSpecs = $mainCameraSpecs;
			$this->MainCameraFeatures = $mainCameraFeatures;
			$this->FrontCameraSpecs = $frontCameraSpecs;
			$this->FrontCameraFeatures = $frontCameraFeatures;
			$this->DisplaySpecs = $displaySpecs;
			$this->MemorySpecs = $memorySpecs;
			$this->NetworkSpecs = $networkSpecs;
			$this->PlatformID = $platformID;
			$this->StorageID = $storageID;
			$this->CPU = $cpu;
			$this->Features = $features;
			$this->BatterySpecs = $batterySpecs;
			$this->PerformanceScore = $performanceScore;
			$this->MainCameraScore = $mainCameraScore;
			$this->FrontCameraScore = $frontCameraScore;
			$this->DisplayScore = $displayScore;
			$this->BatteryLifeScore = $batteryLifeScore;
		}
	}
?>