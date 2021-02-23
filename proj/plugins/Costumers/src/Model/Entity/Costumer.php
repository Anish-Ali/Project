<?php
namespace Costumers\Model\Entity;

use Cake\ORM\Entity;

/**
 * Costumer Entity
 *
 * @property int $id
 * @property string $Name
 * @property string $Password
 * @property string $Email
 *
 * @property \Costumers\Model\Entity\Phinxlog[] $phinxlog
 */
class Costumer extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'Name' => true,
        'Password' => true,
        'Email' => true,
        'phinxlog' => true,
    ];
}
