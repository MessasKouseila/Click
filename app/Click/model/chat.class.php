<?php

/** 
 * @Entity
 * @Table(name="fredouil.chat")
 */
class chat{

	/** @Id @Column(type="integer")
	 *  @GeneratedValue
	 */ 
	public $id;


  /**

   * @ManyToOne(targetEntity="utilisateur")
   *
   * @JoinColumn(name="emetteur", referencedColumnName ="id")

   */

	public $emetteur;
/**

  * @OneToOne(targetEntity="post", cascade={"persist"})

  *@JoinColumn(name="post", referencedColumnName ="id")

  */

	public $post;
    public function __construct() {

    }
}

?>
