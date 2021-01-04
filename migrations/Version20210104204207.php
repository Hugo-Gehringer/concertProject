<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210104204207 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE concert_hall ADD halls_id INT NOT NULL');
        $this->addSql('ALTER TABLE concert_hall ADD CONSTRAINT FK_BE329CF88893650B FOREIGN KEY (halls_id) REFERENCES hall (id)');
        $this->addSql('CREATE INDEX IDX_BE329CF88893650B ON concert_hall (halls_id)');
        $this->addSql('ALTER TABLE hall DROP concert_hall_id');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE concert_hall DROP FOREIGN KEY FK_BE329CF88893650B');
        $this->addSql('DROP INDEX IDX_BE329CF88893650B ON concert_hall');
        $this->addSql('ALTER TABLE concert_hall DROP halls_id');
        $this->addSql('ALTER TABLE hall ADD concert_hall_id INT NOT NULL');
    }
}
