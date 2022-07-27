<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220727131622 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('DELETE FROM "user"');
        $this->addSql('DROP SEQUENCE user_id_seq CASCADE');
        $this->addSql('ALTER TABLE "user" ALTER id DROP DEFAULT');
        $this->addSql('ALTER TABLE "user" ALTER id TYPE varchar(36)');
        $this->addSql('ALTER TABLE "user" ALTER id TYPE UUID using id::uuid');
        $this->addSql('COMMENT ON COLUMN "user".id IS \'(DC2Type:uuid)\'');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('CREATE SEQUENCE user_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('ALTER TABLE "user" ALTER id TYPE INT');
        $this->addSql('ALTER TABLE "user" ALTER id DROP DEFAULT');
        $this->addSql('COMMENT ON COLUMN "user".id IS NULL');
    }
}
