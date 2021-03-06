<?php
/**
 * Skeleton subclass for performing query and update operations on the 'message' table.
 *
 *
 *
 * This class was autogenerated by Propel 1.4.2 on:
 *
 * Sat Mar 19 09:24:02 2011
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 * @package    lib.model
 */
class MessagePeer extends BaseMessagePeer
{

  /**
   * Retrieve ready to use Criteria object
   *
   * @static
   * @param  $discussionId
   * @param Criteria|null $criteria
   * @return Criteria|null
   */
  static public function getMessagesFromDiscussionCriteria($discussionId, Criteria $criteria = null)
  {
    if(is_null($criteria))
    {
      $c = new Criteria();
    }
    else
    {
      $c = clone($criteria);
    }

    $c->add(self::DISCUSSION_ID, $discussionId);
    $c->add(self::VALIDE, 1);

    return $c;
  }

  static public function getLastMessagesFromDiscussion($discussionId, $amount, $startMessagesId = null)
  {
    //var_dump($startMessagesId); die();
    $c = self::getMessagesFromDiscussionCriteria($discussionId);
    if(!is_null($startMessagesId) && $startMessagesId > 0)
    {
      $c->add(self::ID, $startMessagesId, Criteria::GREATER_EQUAL);
    }
    $c->addAscendingOrderByColumn(self::CREATED_AT);

    $messages = self::doSelect($c);

    //var_dump($messages);var_dump("*************");

    // TODO: utiliser une requete SQL qui évite de faire ce traitement car tous les enregistrements sont retournés...
    // Il semblerait par contre, qu'il soit impossible de réaliser cette opération en une seule requête SQL
    $results = (is_null($messages)) ? null : array_slice($messages, 0 - $amount, $amount, true);
    
    //var_dump($results); var_dump($amount); die();
    
    return $results;
  }

  static public function getTotalAmountFromDiscussion($discussionId)
  {
    return self::doCount(self::getMessagesFromDiscussionCriteria($discussionId));
  }
} // MessagePeer
