<?php

/** 
 * @Entity
 * @Table(name="fredouil.post")
 */
class post{

	/** @Id @Column(type="integer")
	 *  @GeneratedValue
	 */ 
	public $id;

	/** @Column(type="string", length=45) */ 
	public $texte;

	/** @Column(type="string", length=45) */ 
	public $image;

	/** @Column(type="datetime") */ 
	public $date;

	public function __construct()
	{
	}

}

?>
