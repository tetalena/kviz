<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210813104656 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'základní data';
    }

    public function up(Schema $schema): void
    {
        /**/
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql("INSERT INTO `kviz` (`id`, `nazev`, `slug`, `popis`) VALUES
        (1, 'DTP', 'dtp', '<div>Základní pojmy předmětu DTP...</div>'),
        (2, 'PT', 'pt', '<div>Základní pojmy z oblasti písma a typografie...</div>'),
        (3, 'Informatika', 'informatika', '<div>Základní pojmy z informatiky...</div>')");

        $this->addSql("INSERT INTO `otazka` (`id`, `kviz_id`, `otazka`) VALUES
        (1, 1, 'Aditivní míšení barev'),
        (2, 1, 'Subtraktivní míšení barev'),
        (3, 1, 'Akcidenční tiskoviny'),
        (4, 2, 'Bezpatkové písmo'),
        (5, 2, 'Patkové písmo'),
        (6, 2, 'Čtverčík'),
        (7, 3, 'Ztrátová komprese'),
        (8, 3, 'Bezztrátová komprese'),
        (9, 3, 'Moiré')");

        $this->addSql("INSERT INTO `odpoved` (`id`, `otazka_id`, `odpoved`, `je_spravna`) VALUES
        (1, 1, 'Systém, ve kterém se míchají barevná světla. Barevný účinek se odečítá.', 0),
        (2, 1, 'Systém, ve kterém se míchají barevná světla. Barevný účinek se sčítá.', 1),
        (3, 1, 'Barevné míšení využívané při tisku.', 0),
        (4, 2, 'Světlo prochází jednotlivými barevnými vrstvami a je stále více pohlcováno. Barevný účinek se odečítá.', 1),
        (5, 2, 'Barevné míšení využívané při zobrazování na monitoru.', 0),
        (6, 2, 'Světlo prochází jednotlivými barevnými vrstvami a je stále více pohlcováno. Barevný účinek se sčítá.', 0),
        (7, 3, 'Tiskoviny s malým podílem grafiky.', 0),
        (8, 3, 'Příležitostné tiskoviny menšího rozsahu.', 1),
        (9, 3, 'Tiskoviny většího rozsahu převážně textové.', 0),
        (10, 4, 'Neproporční písmo.', 0),
        (11, 4, 'Písmo bez patek. Patka (nebo také serif) označuje příčné zakončení tahů písmene.', 1),
        (12, 4, 'Písmo hladké sazby o velikosti 8 až 10 bodů.', 0),
        (13, 5, 'Písmo s patkami – patka (nebo také serif) označuje příčné zakončení tahů písmene.', 1),
        (14, 5, 'Písmo s rovnými dříky – patka (nebo také serif) označuje dřík bez zakončení tahů písmene.', 0),
        (15, 5, 'Písmo v nadpisech, které je větší než 24 bodů.', 0),
        (16, 6, 'Písmový výplněk, jehož šířka je odvozena od výšky nadpisů.', 0),
        (17, 6, 'Písmový výplněk, jehož šířka je rovna velikosti písma. Čtverčík 10bodového písma je tedy 10 bodů, čtverčík 12bodového písma 12 bodů...', 1),
        (18, 6, 'Písmový výplněk, jehož šířka je rovna velikosti písmene M o šířce 10 bodů.', 0),
        (21, 9, 'Efekt vzniklý při laserovém tisku špatným rozlišením dat.', 0),
        (22, 8, 'Bezztrátová komprese obvykle není tak účinná, ale její velkou výhodou je, že komprimovaný soubor lze opačným postupem rekonstruovat do původní podoby.', 1),
        (23, 8, 'Při bezztrátové kompresi jsou některé informace nenávratně ztraceny a nelze je zpět rekonstruovat.', 0),
        (24, 7, 'Při ztrátové kompresi algoritmus náhodně vybírá data, která se nenávratně ztratí.', 0),
        (25, 7, 'Jedná se o speciální postup při ukládání dat, jehož úkolem je zachovat velikost datových souborů.', 0),
        (26, 7, 'Při ztrátové kompresi jsou některé informace nenávratně ztraceny a nelze je zpět rekonstruovat.', 1),
        (27, 9, 'Nežádoucí vzor vzniklý špatným přetiskem.', 0),
        (28, 9, 'Nežádoucí pravidelný vzor vzniklý křížením dvou nebo více sítí v určitých úhlech.', 1),
        (29, 8, 'Při této kompresi jsou data ukládána do mezipaměti a při dekompresi se z paměti obnovují.', 0)");
        /**/
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql("SET FOREIGN_KEY_CHECKS=0");
        $this->addSql("TRUNCATE `odpoved`");
        $this->addSql("TRUNCATE `otazka`");
        $this->addSql("TRUNCATE `kviz`");
        $this->addSql("SET FOREIGN_KEY_CHECKS=1");
    }
}
