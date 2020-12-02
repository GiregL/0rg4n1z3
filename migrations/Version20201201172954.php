<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201201172954 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP INDEX IDX_3BAE0AA77E3C61F9');
        $this->addSql('CREATE TEMPORARY TABLE __temp__event AS SELECT id, owner_id, title, description, date_time FROM event');
        $this->addSql('DROP TABLE event');
        $this->addSql('CREATE TABLE event (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, owner_id INTEGER NOT NULL, title VARCHAR(255) NOT NULL COLLATE BINARY, description CLOB NOT NULL COLLATE BINARY, date_time DATETIME NOT NULL, CONSTRAINT FK_3BAE0AA77E3C61F9 FOREIGN KEY (owner_id) REFERENCES user (id) NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('INSERT INTO event (id, owner_id, title, description, date_time) SELECT id, owner_id, title, description, date_time FROM __temp__event');
        $this->addSql('DROP TABLE __temp__event');
        $this->addSql('CREATE INDEX IDX_3BAE0AA77E3C61F9 ON event (owner_id)');
        $this->addSql('DROP INDEX IDX_B6BD307F816C6140');
        $this->addSql('DROP INDEX IDX_B6BD307FF624B39D');
        $this->addSql('CREATE TEMPORARY TABLE __temp__message AS SELECT id, sender_id, destination_id, content, sent_at FROM message');
        $this->addSql('DROP TABLE message');
        $this->addSql('CREATE TABLE message (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, sender_id INTEGER NOT NULL, destination_id INTEGER NOT NULL, content CLOB NOT NULL COLLATE BINARY, sent_at DATETIME NOT NULL, CONSTRAINT FK_B6BD307FF624B39D FOREIGN KEY (sender_id) REFERENCES user (id) NOT DEFERRABLE INITIALLY IMMEDIATE, CONSTRAINT FK_B6BD307F816C6140 FOREIGN KEY (destination_id) REFERENCES user (id) NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('INSERT INTO message (id, sender_id, destination_id, content, sent_at) SELECT id, sender_id, destination_id, content, sent_at FROM __temp__message');
        $this->addSql('DROP TABLE __temp__message');
        $this->addSql('CREATE INDEX IDX_B6BD307F816C6140 ON message (destination_id)');
        $this->addSql('CREATE INDEX IDX_B6BD307FF624B39D ON message (sender_id)');
        $this->addSql('DROP INDEX IDX_527EDB257E3C61F9');
        $this->addSql('CREATE TEMPORARY TABLE __temp__task AS SELECT id, owner_id, created_at, due_at, title, description, priority FROM task');
        $this->addSql('DROP TABLE task');
        $this->addSql('CREATE TABLE task (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, owner_id INTEGER NOT NULL, created_at DATETIME NOT NULL, due_at DATETIME NOT NULL, title VARCHAR(255) NOT NULL COLLATE BINARY, description CLOB NOT NULL COLLATE BINARY, priority INTEGER NOT NULL, CONSTRAINT FK_527EDB257E3C61F9 FOREIGN KEY (owner_id) REFERENCES user (id) NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('INSERT INTO task (id, owner_id, created_at, due_at, title, description, priority) SELECT id, owner_id, created_at, due_at, title, description, priority FROM __temp__task');
        $this->addSql('DROP TABLE __temp__task');
        $this->addSql('CREATE INDEX IDX_527EDB257E3C61F9 ON task (owner_id)');
        $this->addSql('DROP INDEX IDX_F7129A80233D34C1');
        $this->addSql('DROP INDEX IDX_F7129A803AD8644E');
        $this->addSql('CREATE TEMPORARY TABLE __temp__user_user AS SELECT user_source, user_target FROM user_user');
        $this->addSql('DROP TABLE user_user');
        $this->addSql('CREATE TABLE user_user (user_source INTEGER NOT NULL, user_target INTEGER NOT NULL, PRIMARY KEY(user_source, user_target), CONSTRAINT FK_F7129A803AD8644E FOREIGN KEY (user_source) REFERENCES user (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE, CONSTRAINT FK_F7129A80233D34C1 FOREIGN KEY (user_target) REFERENCES user (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('INSERT INTO user_user (user_source, user_target) SELECT user_source, user_target FROM __temp__user_user');
        $this->addSql('DROP TABLE __temp__user_user');
        $this->addSql('CREATE INDEX IDX_F7129A80233D34C1 ON user_user (user_target)');
        $this->addSql('CREATE INDEX IDX_F7129A803AD8644E ON user_user (user_source)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP INDEX IDX_3BAE0AA77E3C61F9');
        $this->addSql('CREATE TEMPORARY TABLE __temp__event AS SELECT id, owner_id, title, description, date_time FROM event');
        $this->addSql('DROP TABLE event');
        $this->addSql('CREATE TABLE event (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, owner_id INTEGER NOT NULL, title VARCHAR(255) NOT NULL, description CLOB NOT NULL, date_time DATETIME NOT NULL)');
        $this->addSql('INSERT INTO event (id, owner_id, title, description, date_time) SELECT id, owner_id, title, description, date_time FROM __temp__event');
        $this->addSql('DROP TABLE __temp__event');
        $this->addSql('CREATE INDEX IDX_3BAE0AA77E3C61F9 ON event (owner_id)');
        $this->addSql('DROP INDEX IDX_B6BD307FF624B39D');
        $this->addSql('DROP INDEX IDX_B6BD307F816C6140');
        $this->addSql('CREATE TEMPORARY TABLE __temp__message AS SELECT id, sender_id, destination_id, content, sent_at FROM message');
        $this->addSql('DROP TABLE message');
        $this->addSql('CREATE TABLE message (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, sender_id INTEGER NOT NULL, destination_id INTEGER NOT NULL, content CLOB NOT NULL, sent_at DATETIME NOT NULL)');
        $this->addSql('INSERT INTO message (id, sender_id, destination_id, content, sent_at) SELECT id, sender_id, destination_id, content, sent_at FROM __temp__message');
        $this->addSql('DROP TABLE __temp__message');
        $this->addSql('CREATE INDEX IDX_B6BD307FF624B39D ON message (sender_id)');
        $this->addSql('CREATE INDEX IDX_B6BD307F816C6140 ON message (destination_id)');
        $this->addSql('DROP INDEX IDX_527EDB257E3C61F9');
        $this->addSql('CREATE TEMPORARY TABLE __temp__task AS SELECT id, owner_id, created_at, due_at, title, description, priority FROM task');
        $this->addSql('DROP TABLE task');
        $this->addSql('CREATE TABLE task (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, owner_id INTEGER NOT NULL, created_at DATETIME NOT NULL, due_at DATETIME NOT NULL, title VARCHAR(255) NOT NULL, description CLOB NOT NULL, priority INTEGER NOT NULL)');
        $this->addSql('INSERT INTO task (id, owner_id, created_at, due_at, title, description, priority) SELECT id, owner_id, created_at, due_at, title, description, priority FROM __temp__task');
        $this->addSql('DROP TABLE __temp__task');
        $this->addSql('CREATE INDEX IDX_527EDB257E3C61F9 ON task (owner_id)');
        $this->addSql('DROP INDEX IDX_F7129A803AD8644E');
        $this->addSql('DROP INDEX IDX_F7129A80233D34C1');
        $this->addSql('CREATE TEMPORARY TABLE __temp__user_user AS SELECT user_source, user_target FROM user_user');
        $this->addSql('DROP TABLE user_user');
        $this->addSql('CREATE TABLE user_user (user_source INTEGER NOT NULL, user_target INTEGER NOT NULL, PRIMARY KEY(user_source, user_target))');
        $this->addSql('INSERT INTO user_user (user_source, user_target) SELECT user_source, user_target FROM __temp__user_user');
        $this->addSql('DROP TABLE __temp__user_user');
        $this->addSql('CREATE INDEX IDX_F7129A803AD8644E ON user_user (user_source)');
        $this->addSql('CREATE INDEX IDX_F7129A80233D34C1 ON user_user (user_target)');
    }
}
