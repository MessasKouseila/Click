<?php

/** 
 * @Entity
 * @Table(name="fredouil.message")
 */
class message{

	/** @Id @Column(type="integer")
	 *  @GeneratedValue
	 */ 
	public $id;

	/** @Column(type="integer") */ 
	public $aime;
		

  /**

   * @ManyToOne(targetEntity="utilisateur")

   * @JoinColumn(name="emetteur", referencedColumnName ="id"))

   */

  public $emetteur;
  /**

   * @ManyToOne(targetEntity="utilisateur",inversedBy="messages")

   * @JoinColumn(name="destinataire", referencedColumnName ="id")

   */

  public $destinataire;
  /**

   * @ManyToOne(targetEntity="utilisateur")

   * @JoinColumn(name="parent", referencedColumnName ="id")

   */

  public $parent;

/**

  * @OneToOne(targetEntity="Post", cascade={"persist"})

  * @JoinColumn(name="post", referencedColumnName ="id")

  */

public $post;
	
}

?>
