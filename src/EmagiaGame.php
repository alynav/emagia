<?php
namespace Emagia;

use Emagia\Actions\Attack;
use Emagia\Actions\Defence;
use Emagia\Players\Player;
use Emagia\Players\PlayerFactory;
use Emagia\Skills\MagicShield;
use Emagia\Skills\RapidStrike;
use Emagia\Skills\SkillInterface;

class EmagiaGame
{
    private $action;
    /** @var Player */
    private $hero;
    /** @var Player */
    private $wildBeast;

    public function startGame()
    {
        $this->initGame();
        $rounds = 1;

        while ($rounds <= GameSetting::ROUNDS && $this->playersAlive()){
            Utils::log(
                sprintf('%s strength: %.2f, defence: %.2f, health: %.2f',
                    $this->hero->getName(),
                    $this->hero->getStrength(),
                    $this->hero->getDefence(),
                    $this->hero->getHealth()
                ));

            Utils::log(
                sprintf('%s strength: %.2f, defence: %.2f, health: %.2f',
                    $this->wildBeast->getName(),
                    $this->wildBeast->getStrength(),
                    $this->wildBeast->getDefence(),
                    $this->wildBeast->getHealth()
                ));
            Utils::log(sprintf('>>>>> Round %d <<<<<', $rounds));

            if ($this->action == Attack::class){
                Utils::log('Hero Attack');
                $damage = $this->hero->getStrength() - $this->wildBeast->getDefence();

                $skillDamage = 0;
                /** @var SkillInterface $skill */
                foreach ($this->hero->getSkills() as $skill) {
                    if ($skill->canBeUsed($this->action)){
                        Utils::log('Skill ' . get_class($skill) . ' is used by Hero');
                        $skillDamage += $damage * $skill->getPower();
                    }
                }

                if ($skillDamage > 0) {
                    $damage = $skillDamage;
                }

                Utils::log(sprintf('Damage: %.2f', $damage));
                $this->wildBeast->setHealth($this->wildBeast->getHealth() - $damage);

            }

            if ($this->action == Defence::class){
                Utils::log('Wild Beast Attack');
                $damage = $this->wildBeast->getStrength() - $this->hero->getDefence();

                $skillDamage = $damage;
                /** @var SkillInterface $skill */
                foreach ($this->hero->getSkills() as $skill){
                    if ($skill->canBeUsed($this->action)){
                        Utils::log('Skill ' . get_class($skill) . ' is used by Hero');
                        $skillDamage -= $damage * $skill->getPower();
                    }
                }

                Utils::log(sprintf('Damage: %.2f', $skillDamage));
                $this->hero->setHealth($this->hero->getHealth() - $skillDamage);
            }

            $this->switchAction();
            $rounds++;
        }

        $this->showWinner($rounds);
    }

    private function showWinner(int $rounds): void
    {
        if ($rounds > GameSetting::ROUNDS){
            Utils::log('***** No winner *****');
            return;
        }
        if ($this->hero->isAlive()){
            Utils::log(sprintf('***** Winner is %s *****', $this->hero->getName()));
        }
        if ($this->wildBeast->isAlive()){
            Utils::log(sprintf('***** Winner is %s *****', $this->wildBeast->getName()));
        }
    }

    private function initGame()
    {
        $this->initPlayers();
        $this->initAction();
    }

    private function initPlayers(): void
    {
        $this->hero = PlayerFactory::createHero();
        $this->addHeroSkills();

        $this->wildBeast = PlayerFactory::createWildBeast();
    }

    private function addHeroSkills(): void
    {
        $rapidStrike = new RapidStrike();
        $rapidStrike->setPower(GameSetting::RAPID_STRIKE['POWER'])
            ->setChance(GameSetting::RAPID_STRIKE['CHANCE']);

        $magicShield = new MagicShield();
        $magicShield->setPower(GameSetting::MAGIC_SHIELD['POWER'])
            ->setChance(GameSetting::MAGIC_SHIELD['CHANCE']);

        $this->hero->addSkill($rapidStrike)
            ->addSkill($magicShield);
    }

    private function initAction(): void
    {
        if ($this->hero->getSpeed() > $this->wildBeast->getSpeed() ||
            $this->hero->getLuck() > $this->wildBeast->getLuck()){
            $this->action = Attack::class;
        } else {
            $this->action = Defence::class;
        }
    }

    private function playersAlive(): bool
    {
        return $this->hero->isAlive() && $this->wildBeast->isAlive();
    }

    private function switchAction(): void
    {
        $actions = [Attack::class, Defence::class];
        $key = !array_search($this->action, $actions);
        $this->action = $actions[$key];

    }
}
