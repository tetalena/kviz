<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210812152653 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Zaznamenávání výsledků kvízu pro přihlášené uživatele';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE vysledek (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, kviz_id INT NOT NULL, procent DOUBLE PRECISION NOT NULL, INDEX IDX_2655745AA76ED395 (user_id), UNIQUE INDEX UNIQ_2655745AC006605B (kviz_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE vysledek ADD CONSTRAINT FK_2655745AA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE vysledek ADD CONSTRAINT FK_2655745AC006605B FOREIGN KEY (kviz_id) REFERENCES kviz (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE vysledek');
    }
}
