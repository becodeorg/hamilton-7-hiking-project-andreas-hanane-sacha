<?php
declare(strict_types=1);

class HikeController
{
    private HikeModel $hikeModel;

    public function __construct()
    {
        $this->hikeModel = new HikeModel();
    }

    public function getHikesList(): array
    {
        $userController = new UserController();

        $hikes = $this->hikeModel->getHikes();

        for ($i = 0; $i < count($hikes); $i++) {
            $tags = $this->hikeModel->getTags($hikes[$i]['id']);
            $hikes[$i]['tags'] = [];

            for ($j = 0; $j < count($tags); $j++) {
                array_push($hikes[$i]['tags'], $tags[$j]['name']);
            }

            $user = $userController->getUser(intval($hikes[$i]['id_user']));
            $hikes[$i]['createdBy'] = $user['nickname'];

            if ($hikes[$i]['isUpdated']) {
                $hikes[$i]['updatedBy'] = $user['nickname'];
            }
        }

        return $hikes;
    }

    public function showSingleHike(int $id): void
    {
        $userController = new UserController();
        $tagsController = new TagsController();

        $hike = $this->hikeModel->getHike($id);
        $tags = $this->hikeModel->getTags(intval($hike['id']));
        $hike['tags'] = [];
        $allTags = $tagsController->getTags();

        for ($i = 0; $i < count($tags); $i++) {
            array_push($hike['tags'], $tags[$i]['name']);
        }

        $user = $userController->getUser(intval($hike['id_user']));
        $hike['createdBy'] = $user['nickname'];

        include 'views/includes/header.view.php';
        include 'views/includes/navbar.view.php';
        include 'views/singleHike.view.php';
        include 'views/includes/footer.view.php';
    }

    /**
     * @throws Exception
     */
    public function addHike(array $input): void
    {
        if (empty($input['name'] || empty($input['distance']) ||
            empty($input['duration']) || empty($input['elevation_gain']) ||
            empty($input['description'] || empty($input['tags'])))) {

            throw new Exception('Form data not validated.');
        }

        $name = htmlspecialchars($input['name']);
        $description = htmlspecialchars($input['description']);
        $tagsId = $input['tags'];

        $this->hikeModel->create($name, $input['distance'], $input['duration'], $input['elevation_gain'], $description);

        $id_hike = $this->hikeModel->getLastInsertId();

        foreach ($tagsId as $id_tag) {
            $this->hikeModel->linkTags($id_tag, $id_hike);
        }

        http_response_code(302);
        header('location: /');
    }

    public function showNewHikeForm(): void
    {
        $tagsController = new TagsController();
        $tags = $tagsController->getTags();

        include 'views/includes/header.view.php';
        include 'views/includes/navbar.view.php';
        include 'views/newHike.view.php';
        include 'views/includes/footer.view.php';
    }


    public function updateHike(array $input, int $id): void
    {
        if (empty($input['name']) || empty($input['duration']) || empty($input['distance']) || empty($input['duration']) ||
            empty($input['elevation_gain']) || empty($input['description']) || empty($input['tags'])) {
            throw new Exception('Form data not validated.');
        }

        $name = htmlspecialchars($input['name']);
        $distance = $input['distance'];
        $duration = $input['duration'];
        $elevation_gain = $input['elevation_gain'];
        $description = htmlspecialchars($input['description']);

        $this->hikeModel->update($id, $name, $distance, $duration, $elevation_gain, $description);

        $this->deleteHikeTag($id);

        $tagsId = $input['tags'];
        foreach ($tagsId as $id_tag) {
            $this->hikeModel->linkTags($id_tag, strval($id));
        }

        http_response_code(302);
        header('location: /singleHike?id=' .$id);
    }

    /**
     * @throws Exception
     */
    public function deleteHike(int $id): void
    {
        $this->hikeModel->delete($id);
        $this->deleteHikeTag($id);

        http_response_code(302);
        header('location: /');
    }

    public function deleteHikeTag(int $id): void
    {
        $this->hikeModel->deleteTags($id);
    }

    public function getUserHikes(int $id_user): array
    {
        return $this->hikeModel->getUserHikes($id_user);
    }
}