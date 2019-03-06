<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Installment Entity
 *
 * @property int $id
 * @property int $purchase_id
 * @property float $value
 * @property \Cake\I18n\FrozenDate $start
 * @property int $installments
 * @property int $remaning_installments
 *
 * @property \App\Model\Entity\Purchase $purchase
 */
class Installment extends Entity
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
        'purchase_id' => true,
        'value' => true,
        'start' => true,
        'installments' => true,
        'remaning_installments' => true,
        'purchase' => true
    ];
}
