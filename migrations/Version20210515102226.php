<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210515102226 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE post (id INT AUTO_INCREMENT NOT NULL, auteur_id INT NOT NULL, contenu LONGTEXT NOT NULL, created_at DATETIME DEFAULT NULL, update_at DATETIME DEFAULT NULL, is_deleted TINYINT(1) NOT NULL, is_validated TINYINT(1) NOT NULL, INDEX IDX_5A8A6C8D60BB6FE6 (auteur_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE post_technologies (post_id INT NOT NULL, technologies_id INT NOT NULL, INDEX IDX_E7F686CB4B89032C (post_id), INDEX IDX_E7F686CB8F8A14FA (technologies_id), PRIMARY KEY(post_id, technologies_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE technologies (id INT AUTO_INCREMENT NOT NULL, libelle VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, lib_unique VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE post ADD CONSTRAINT FK_5A8A6C8D60BB6FE6 FOREIGN KEY (auteur_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE post_technologies ADD CONSTRAINT FK_E7F686CB4B89032C FOREIGN KEY (post_id) REFERENCES post (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE post_technologies ADD CONSTRAINT FK_E7F686CB8F8A14FA FOREIGN KEY (technologies_id) REFERENCES technologies (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE post_technologies DROP FOREIGN KEY FK_E7F686CB4B89032C');
        $this->addSql('ALTER TABLE post_technologies DROP FOREIGN KEY FK_E7F686CB8F8A14FA');
        $this->addSql('DROP TABLE post');
        $this->addSql('DROP TABLE post_technologies');
        $this->addSql('DROP TABLE technologies');
    }
}
