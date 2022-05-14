<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220514115856 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP INDEX UNIQ_C7440455F85E0677');
        $this->addSql('CREATE TEMPORARY TABLE __temp__client AS SELECT id, username, roles, password, name FROM client');
        $this->addSql('DROP TABLE client');
        $this->addSql('CREATE TABLE client (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, username VARCHAR(180) NOT NULL, roles CLOB NOT NULL --(DC2Type:json)
        , password VARCHAR(255) NOT NULL, name VARCHAR(40) NOT NULL, merchant_id INTEGER NOT NULL)');
        $this->addSql('INSERT INTO client (id, username, roles, password, name) SELECT id, username, roles, password, name FROM __temp__client');
        $this->addSql('DROP TABLE __temp__client');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_C7440455F85E0677 ON client (username)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
//        $this->addSql('DROP INDEX UNIQ_C7440455F85E0677');
//        $this->addSql('CREATE TEMPORARY TABLE __temp__client AS SELECT id, username, roles, password, name FROM client');
//        $this->addSql('DROP TABLE client');
//        $this->addSql('CREATE TABLE client (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, username VARCHAR(180) NOT NULL, roles CLOB NOT NULL --
//(DC2Type:json)
//        , password VARCHAR(255) NOT NULL, name VARCHAR(40) NOT NULL)');
//        $this->addSql('INSERT INTO client (id, username, roles, password, name) SELECT id, username, roles, password, name FROM __temp__client');
//        $this->addSql('DROP TABLE __temp__client');
//        $this->addSql('CREATE UNIQUE INDEX UNIQ_C7440455F85E0677 ON client (username)');
    }
}
