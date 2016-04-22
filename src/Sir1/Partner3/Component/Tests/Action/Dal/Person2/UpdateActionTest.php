<?php

namespace Sir1\Partner3\Component\Tests\Action\Dal\Person2;

use Sir1\Partner3\Component\Action\Dal\Person2\UpdateAction;
use Sir1\Partner3\Component\Entity\Person2;
use Sir1\Partner3\Component\Event\Person2Event;
use Sir1\Partner3\Component\Event\Person2Events;
use Prophecy\Argument;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;

/**
 * Unit test class for Person2 DeleteAction throught Dal.
 *
 * @see Sir1\Partner3\Component\Domain\Action\Dal\Person2\UpdateAction
 */
class UpdateActionTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Provides use cases to resolve() function tests.
     *
     * @example
     *     array(
     *         "given_update_data",
     *         "given_person2"
     *     )
     *
     * @return array()
     */
    public function resolvingCasesProvider()
    {
        return array(
            'no_extra_fields_given' => array(
                array(),
                (new Person2())->setId(42),
            ),
        );
    }

    /**
     * Tests resolve() function.
     *
     * @dataProvider resolvingCasesProvider
     */
    public function testResolve(
        array $incommingData,
        Person2 $givenPerson2
    ) {
        $asserter = $this;

        // Validator
        $validator = $this->prophesize(ValidatorInterface::class);
        $validator
            ->validate(
                Argument::type(Person2::class),
                null,
                array('Person2', 'edition')
            )
            ->shouldBeCalled()
        ;

        // Event dispatcher
        $eventDispatcher = $this->prophesize(EventDispatcherInterface::class);
        $eventDispatcher
            ->dispatch(
                Person2Events::SIR1_PERSON2_EDITED,
                Argument::type(Person2Event::class)
            )
            ->will(function ($args) use ($asserter, $givenPerson2) {
                $asserter->assertEquals(
                    $givenPerson2,
                    $args[1]->getPerson2()
                );
            })
            ->shouldBeCalled()
        ;

        // Action
        $action = new UpdateAction();
        $action->setValidator($validator->reveal());
        $action->deserialize($incommingData);
        $action->setEventDispatcher($eventDispatcher->reveal());
        $action->init($givenPerson2);

        $action->resolve();
    }
}
