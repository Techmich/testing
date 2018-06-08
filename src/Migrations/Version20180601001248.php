<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20180601001248 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'sqlite', 'Migration can only be executed safely on \'sqlite\'.');

        $this->addSql('CREATE TABLE shows (id INTEGER NOT NULL, theater_id INTEGER DEFAULT NULL, title VARCHAR(255) NOT NULL, artist VARCHAR(255) NOT NULL, date DATETIME NOT NULL, description CLOB NOT NULL, url VARCHAR(255) DEFAULT NULL, image VARCHAR(255) DEFAULT NULL, close BOOLEAN NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_6C3BF144D70E4479 ON shows (theater_id)');
        $this->addSql('CREATE TABLE tickets (id INTEGER NOT NULL, show_id INTEGER DEFAULT NULL, id2 CHAR(36) NOT NULL --(DC2Type:guid)
        , status VARCHAR(50) NOT NULL, price DOUBLE PRECISION NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_54469DF47101D69E ON tickets (id2)');
        $this->addSql('CREATE INDEX IDX_54469DF4D0C1FC64 ON tickets (show_id)');
        $this->addSql('CREATE TABLE theaters (id INTEGER NOT NULL, address VARCHAR(255) NOT NULL, capacity INTEGER NOT NULL, administrator INTEGER NOT NULL, PRIMARY KEY(id))');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'sqlite', 'Migration can only be executed safely on \'sqlite\'.');

        $this->addSql('DROP TABLE shows');
        $this->addSql('DROP TABLE tickets');
        $this->addSql('DROP TABLE theaters');
    }
}
