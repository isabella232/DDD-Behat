<?php

namespace MajoraVendor\MajoraNamespace\Component\Entity;

use Majora\Framework\Model\CollectionableInterface;
use Majora\Framework\Model\CollectionableTrait;
use Majora\Framework\Serializer\Model\SerializableTrait;
use Majora\Framework\Model\TimedTrait;

/**
 * MajoraEntity model class.
 */
class MajoraEntity implements CollectionableInterface
{
    use CollectionableTrait, SerializableTrait, TimedTrait;

    /**
     * @var int
     */
    protected $id;

    /**
     * @see ScopableInterface::getScopes()
     */
    public static function getScopes()
    {
        return array(
            'id' => 'id',
            'default' => array('id'),
        );
    }

    /**
     * Returns MajoraEntity id.
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Define MajoraEntity id.
     *
     * @param int $id
     *
     * @return self
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    // *************************************************
    //
    // Class auto generated by MajoraGeneratorBundle
    // Implement your own logic here !
    //
    // *************************************************
}
