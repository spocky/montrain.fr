<?php


/**
 * This class defines the structure of the 'ligne' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    lib.model.map
 */
class LigneTableMap extends TableMap {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'lib.model.map.LigneTableMap';

	/**
	 * Initialize the table attributes, columns and validators
	 * Relations are not initialized by this method since they are lazy loaded
	 *
	 * @return     void
	 * @throws     PropelException
	 */
	public function initialize()
	{
	  // attributes
		$this->setName('ligne');
		$this->setPhpName('Ligne');
		$this->setClassname('Ligne');
		$this->setPackage('lib.model');
		$this->setUseIdGenerator(false);
		// columns
		$this->addPrimaryKey('ID', 'Id', 'INTEGER', true, null, null);
		$this->addColumn('NOM', 'Nom', 'VARCHAR', true, 255, null);
		$this->addColumn('VALIDE', 'Valide', 'BOOLEAN', true, null, true);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
    $this->addRelation('LigneGare', 'LigneGare', RelationMap::ONE_TO_MANY, array('id' => 'ligne_id', ), null, null);
    $this->addRelation('Discussion', 'Discussion', RelationMap::ONE_TO_MANY, array('id' => 'ligne_id', ), null, null);
	} // buildRelations()

	/**
	 * 
	 * Gets the list of behaviors registered for this table
	 * 
	 * @return array Associative array (name => parameters) of behaviors
	 */
	public function getBehaviors()
	{
		return array(
			'symfony' => array('form' => 'true', 'filter' => 'true', ),
			'symfony_behaviors' => array(),
		);
	} // getBehaviors()

} // LigneTableMap
