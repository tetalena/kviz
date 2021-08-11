<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210811060823 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE odpoved (id INT AUTO_INCREMENT NOT NULL, otazka_id INT DEFAULT NULL, odpoved LONGTEXT NOT NULL, INDEX IDX_EB4987E53EC9665F (otazka_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE otazka (id INT AUTO_INCREMENT NOT NULL, kviz_id INT NOT NULL, otazka VARCHAR(255) NOT NULL, INDEX IDX_2272C461C006605B (kviz_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE odpoved ADD CONSTRAINT FK_EB4987E53EC9665F FOREIGN KEY (otazka_id) REFERENCES otazka (id)');
        $this->addSql('ALTER TABLE otazka ADD CONSTRAINT FK_2272C461C006605B FOREIGN KEY (kviz_id) REFERENCES kviz (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE odpoved DROP FOREIGN KEY FK_EB4987E53EC9665F');
        $this->addSql('DROP TABLE odpoved');
        $this->addSql('DROP TABLE otazka');
    }
}
