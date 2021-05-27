<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210501153927 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE personne ADD prenom VARCHAR(255) NOT NULL, ADD email VARCHAR(128) NOT NULL, ADD num_tel VARCHAR(13) NOT NULL, ADD age INT NOT NULL, ADD sexe VARCHAR(1) NOT NULL, ADD created_at DATETIME NOT NULL, ADD update_at DATETIME DEFAULT NULL, ADD is_activated TINYINT(1) NOT NULL, ADD is_deleted TINYINT(1) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE personne DROP prenom, DROP email, DROP num_tel, DROP age, DROP sexe, DROP created_at, DROP update_at, DROP is_activated, DROP is_deleted');
    }
}
