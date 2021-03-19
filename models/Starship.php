<?php


class Starship
{
    /** @var string */
    public $name;
    /** @var string */
    public $model;
    /** @var string */
    public $manufacturer;
    /** @var string */
    public $cost_in_credits;
    /** @var int m */
    public $length;
    /** @var string */
    public $max_atmosphering_speed;
    /** @var int */
    public $crew;
    /** @var string */
    public $passengers;
    /** @var string */
    public $cargo_capacity;
    /** @var string */
    public $consumables;
    /** @var float */
    public $hyperdrive_rating;
    /** @var string */
    public $MGLT;
    /** @var string */
    public $starship_class;
    /** @var [] */
    public $pilots;
    /** @var [] */
    public $films;
    /** @var \DateTime */
    public $created;
    /** @var \DateTime */
    public $edited;
    /** @var string */
    public $url;

    public function __construct()
    {
    }
}