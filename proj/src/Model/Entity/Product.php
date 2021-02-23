<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Product Entity
 *
 * @property int $id
 * @property string $name
 * @property string $image
 * @property string $price
 * @property string $about
 * @property \Cake\I18n\FrozenDate $relese
 * @property string $description
 * @property string $ram
 * @property string $processor
 * @property string $storage
 * @property string $gcard
 * @property int|null $category_id
 *
 * @property \App\Model\Entity\Category $category
 * @property \App\Model\Entity\Cart[] $carts
 * @property \App\Model\Entity\Phinxlog[] $phinxlog
 */
class Product extends Entity
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
        'name' => true,
        'image' => true,
        'price' => true,
        'about' => true,
        'relese' => true,
        'description' => true,
        'ram' => true,
        'processor' => true,
        'storage' => true,
        'gcard' => true,
        'category_id' => true,
        'category' => true,
        'carts' => true,
        
    ];
}
