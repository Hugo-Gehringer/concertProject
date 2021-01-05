<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210104205806 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE concert_hall DROP total_places, CHANGE city city VARCHAR(60) DEFAULT NULL');
        $this->addSql('ALTER TABLE hall ADD CONSTRAINT FK_1B8FA83FC8B57370 FOREIGN KEY (concert_hall_id) REFERENCES concert_hall (id)');
        $this->addSql('CREATE INDEX IDX_1B8FA83FC8B57370 ON hall (concert_hall_id)');
        $this->addSql('ALTER TABLE user ADD firstname VARCHAR(50) NOT NULL, ADD lastname VARCHAR(50) NOT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE concert_hall ADD total_places INT NOT NULL, CHANGE city city VARCHAR(60) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE hall DROP FOREIGN KEY FK_1B8FA83FC8B57370');
        $this->addSql('DROP INDEX IDX_1B8FA83FC8B57370 ON hall');
        $this->addSql('ALTER TABLE user DROP firstname, DROP lastname');
    }
}
