<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211111141116 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE registration DROP FOREIGN KEY FK_62A8A7A771F7E88B');
        $this->addSql('ALTER TABLE registration DROP FOREIGN KEY FK_62A8A7A79D1C3019');
        $this->addSql('CREATE UNIQUE INDEX lien ON registration (event_id, participant_id)');
        $this->addSql('DROP INDEX idx_62a8a7a771f7e88b ON registration');
        $this->addSql('CREATE INDEX IDX_7A997C5F71F7E88B ON registration (event_id)');
        $this->addSql('DROP INDEX idx_62a8a7a79d1c3019 ON registration');
        $this->addSql('CREATE INDEX IDX_7A997C5F9D1C3019 ON registration (participant_id)');
        $this->addSql('ALTER TABLE registration ADD CONSTRAINT FK_62A8A7A771F7E88B FOREIGN KEY (event_id) REFERENCES event (id)');
        $this->addSql('ALTER TABLE registration ADD CONSTRAINT FK_62A8A7A79D1C3019 FOREIGN KEY (participant_id) REFERENCES participant (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP INDEX lien ON Registration');
        $this->addSql('ALTER TABLE Registration DROP FOREIGN KEY FK_7A997C5F71F7E88B');
        $this->addSql('ALTER TABLE Registration DROP FOREIGN KEY FK_7A997C5F9D1C3019');
        $this->addSql('DROP INDEX idx_7a997c5f71f7e88b ON Registration');
        $this->addSql('CREATE INDEX IDX_62A8A7A771F7E88B ON Registration (event_id)');
        $this->addSql('DROP INDEX idx_7a997c5f9d1c3019 ON Registration');
        $this->addSql('CREATE INDEX IDX_62A8A7A79D1C3019 ON Registration (participant_id)');
        $this->addSql('ALTER TABLE Registration ADD CONSTRAINT FK_7A997C5F71F7E88B FOREIGN KEY (event_id) REFERENCES Event (id)');
        $this->addSql('ALTER TABLE Registration ADD CONSTRAINT FK_7A997C5F9D1C3019 FOREIGN KEY (participant_id) REFERENCES Participant (id)');
    }
}
