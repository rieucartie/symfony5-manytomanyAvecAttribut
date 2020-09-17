<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200917095047 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE article (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE article_competence (id INT AUTO_INCREMENT NOT NULL, article_id INT NOT NULL, competence_id INT NOT NULL, niveau VARCHAR(255) NOT NULL, INDEX IDX_A80DB9FE7294869C (article_id), INDEX IDX_A80DB9FE15761DAB (competence_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE competence (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE article_competence ADD CONSTRAINT FK_A80DB9FE7294869C FOREIGN KEY (article_id) REFERENCES article (id)');
        $this->addSql('ALTER TABLE article_competence ADD CONSTRAINT FK_A80DB9FE15761DAB FOREIGN KEY (competence_id) REFERENCES competence (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE article_competence DROP FOREIGN KEY FK_A80DB9FE7294869C');
        $this->addSql('ALTER TABLE article_competence DROP FOREIGN KEY FK_A80DB9FE15761DAB');
        $this->addSql('DROP TABLE article');
        $this->addSql('DROP TABLE article_competence');
        $this->addSql('DROP TABLE competence');
    }
}
