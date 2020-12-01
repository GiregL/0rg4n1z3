<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201201155339 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE event (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, owner_id INTEGER NOT NULL, title VARCHAR(255) NOT NULL, description CLOB NOT NULL, date_time DATETIME NOT NULL)');
        $this->addSql('CREATE INDEX IDX_3BAE0AA77E3C61F9 ON event (owner_id)');
        $this->addSql('CREATE TABLE message (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, sender_id INTEGER NOT NULL, destination_id INTEGER NOT NULL, content CLOB NOT NULL, sent_at DATETIME NOT NULL)');
        $this->addSql('CREATE INDEX IDX_B6BD307FF624B39D ON message (sender_id)');
        $this->addSql('CREATE INDEX IDX_B6BD307F816C6140 ON message (destination_id)');
        $this->addSql('CREATE TABLE task (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, owner_id INTEGER NOT NULL, created_at DATETIME NOT NULL, due_at DATETIME NOT NULL, title VARCHAR(255) NOT NULL, description CLOB NOT NULL, priority INTEGER NOT NULL)');
        $this->addSql('CREATE INDEX IDX_527EDB257E3C61F9 ON task (owner_id)');
        $this->addSql('CREATE TABLE user_user (user_source INTEGER NOT NULL, user_target INTEGER NOT NULL, PRIMARY KEY(user_source, user_target))');
        $this->addSql('CREATE INDEX IDX_F7129A803AD8644E ON user_user (user_source)');
        $this->addSql('CREATE INDEX IDX_F7129A80233D34C1 ON user_user (user_target)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE event');
        $this->addSql('DROP TABLE message');
        $this->addSql('DROP TABLE task');
        $this->addSql('DROP TABLE user_user');
    }
}
