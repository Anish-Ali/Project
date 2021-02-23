<?php
namespace Carts\Model\Entity;

use Cake\ORM\Entity;

/**
 * Cart Entity
 *
 * @property int $id
 * @property string $quantity
 * @property \Cake\I18n\FrozenTime $created
 * @property int|null $product_id
 * @property string $Price
 * @property string $Name
 * @property string $Image
 *
 * @property \Carts\Model\Entity\Product $product
 * @property \Carts\Model\Entity\Phinxlog[] $phinxlog
 */
class Cart extends Entity
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
        'quantity' => true,
        'created' => true,
        'product_id' => true,
        'Price' => true,
        'Name' => true,
        'Image' => true,
        'product' => true,
        'phinxlog' => true,
    ];
}
