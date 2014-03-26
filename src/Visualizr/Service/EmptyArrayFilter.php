<?php

namespace Visualizr\Service;

class EmptyArrayFilter {

	public $dataArray;

	public function getDataArray($dataArray)
	{
		$this->dataArray = $dataArray;
	}

	public function dataFilter()
	{
		foreach( $this->dataArray as $key => $value ) {
		    if( is_array( $value ) ) {
		        foreach( $value as $key2 => $value2 ) {
		            if( empty( $value2 ) ) 
		                unset( $this->dataArray[ $key ][ $key2 ] );
		        }
		    }
		    if( empty( $this->dataArray[ $key ] ) )
		        unset( $this->dataArray[ $key ] );
		}

		return $this->dataArray;
	}

}