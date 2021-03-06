<?php

namespace spec\Cakper;

use Cakper\SpecificationInterface;
use PhpSpec\ObjectBehavior;

class AndSpecificationSpec extends ObjectBehavior
{
    function let(SpecificationInterface $specificationA, SpecificationInterface $specificationB)
    {
        $this->beConstructedWith($specificationA, $specificationB);
    }

    function it_returns_true_if_both_specifications_are_satisfied(SpecificationInterface $specificationA, SpecificationInterface $specificationB, \StdClass $object)
    {
        $specificationA->isSatisfiedBy($object)->willReturn(true);
        $specificationB->isSatisfiedBy($object)->willReturn(true);

        $this->isSatisfiedBy($object)->shouldReturn(true);
    }

    function it_returns_false_if_one_of_the_specifications_is_not_satisfied(SpecificationInterface $specificationA, SpecificationInterface $specificationB, \StdClass $object)
    {
        $specificationA->isSatisfiedBy($object)->willReturn(false);
        $specificationB->isSatisfiedBy($object)->willReturn(true);

        $this->isSatisfiedBy($object)->shouldReturn(false);
    }
}
