<?php


/**
 * This class defines the structure of the 'ligne_gare' table.
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
class LigneGareTableMap extends TableMap {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'lib.model.map.LigneGareTableMap';

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
		$this->setName('ligne_gare');
		$this->setPhpName('LigneGare');
		$this->setClassname('LigneGare');
		$this->setPackage('lib.model');
		$this->setUseIdGenerator(false);
		// columns
		$this->addForeignPrimaryKey('LIGNE_ID', 'LigneId', 'INTEGER' , 'ligne', 'ID', true, null, null);
		$this->addForeignPrimaryKey('GARE_ID', 'GareId', 'INTEGER' , 'gare', 'ID', true, null, null);
		$this->addColumn('VALIDE', 'Valide', 'BOOLEAN', true, null, true);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
    $this->addRelation('Ligne', 'Ligne', RelationMap::MANY_TO_ONE, array('ligne_id' => 'id', ), null, null);
    $this->addRelation('Gare', 'Gare', RelationMap::MANY_TO_ONE, array('gare_id' => 'id', ), null, null);
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

} // LigneGareTableMap
