<?php

namespace Johnathan\FootballData;

use GuzzleHttp\Client;
use Psr\Http\Message\ResponseInterface;

class FootballData {

    protected $client;

    /**
     * FootballData constructor.
     * @param string $authToken
     */
    public function __construct(string $authToken)
    {
        $this->client = new Client([
            'base_uri' => 'http://api.football-data.org/v2/',
            'headers' => [
                'X-Auth-Token' => $authToken,
            ]
        ]);
    }

    /**
     * @param ResponseInterface $request
     * @return mixed
     */
    private function prepareResponse(ResponseInterface $request)
    {
        return json_decode($request->getBody()->getContents());
    }

    // Areas

    /**
     * @return array
     */
    public function getAreas() : array
    {
        $request = $this->client->get('areas');

        return $this->prepareResponse($request)->areas;
    }

    /**
     * @param int $areaId
     * @return \stdClass
     */
    public function getArea(int $areaId) : \stdClass
    {
        $request = $this->client->get(sprintf('areas/%s', $areaId));

        return $this->prepareResponse($request);
    }

    // Competitions

    /**
     * @param int $competitionId
     * @return \stdClass
     */
    public function getCompetition(int $competitionId) : \stdClass
    {
        $request = $this->client->get(sprintf('competitions/%s', $competitionId));

        return $this->prepareResponse($request);
    }

    /**
     * @return array
     */
    public function getCompetitions() : array
    {
        $request = $this->client->get('competitions');

        return $this->prepareResponse($request)->competitions;
    }

    /**
     * @param int $competitionId
     * @return array
     */
    public function getCompetitionTeams(int  $competitionId) : array
    {
        $request = $this->client->get(sprintf('competitions/%s/teams', $competitionId));

        return $this->prepareResponse($request)->teams;
    }

    /**
     * @param int $competitionId
     * @return array
     */
    public function getCompetitionStandings(int $competitionId) : array
    {
        $request = $this->client->get(sprintf('competitions/%s/standings', $competitionId));

        return $this->prepareResponse($request)->standings;
    }

    /**
     * @param $competitionId
     * @return array
     */
    public function getCompetitionMatches($competitionId) : array
    {
        $request = $this->client->get(sprintf('competitions/%s/matches', $competitionId));

        return $this->prepareResponse($request)->matches;
    }

    // Matches

    /**
     * @return array
     */
    public function getMatches() : array
    {
        $request = $this->client->get('matches');

        return $this->prepareResponse($request)->matches;
    }

    /**
     * @param int $matchId
     * @return \stdClass
     */
    public function getMatch(int $matchId) : \stdClass
    {
        $request = $this->client->get(sprintf('matches/%s', $matchId));

        return $this->prepareResponse($request);
    }

    // Players

    /**
     * @param int $playerId
     * @return \stdClass
     */
    public function getPlayer(int $playerId) : \stdClass
    {
        $request = $this->client->get(sprintf('players/%s', $playerId));

        return $this->prepareResponse($request);
    }

    /**
     * @param int $playerId
     * @return array
     */
    public function getPlayerMatches(int $playerId) : array
    {
        $request = $this->client->get(sprintf('players/%s/matches', $playerId));

        return $this->prepareResponse($request)->matches;
    }

    // Teams

    /**
     * @param int $teamId
     * @return \stdClass
     */
    public function getTeam(int $teamId) : \stdClass
    {
        $request = $this->client->get(sprintf('teams/%s', $teamId));

        return $this->prepareResponse($request);
    }

    /**
     * @param int $teamId
     * @return mixed
     */
    public function getTeamMatches(int $teamId)
    {
        $request = $this->client->get(sprintf('teams/%s/matches', $teamId));

        return $this->prepareResponse($request)->matches;
    }
}
