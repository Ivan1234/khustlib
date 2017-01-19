<?php

namespace app\modules\news\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\news\models\News;

/**
 * NewsSearch represents the model behind the search form about `app\modules\news\models\News`.
 */
class NewsSearch extends News
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'visible', 'author', 'position', 'created', 'modified'], 'integer'],
            [['label', 'alias', 'content', 'announce', 'image_id', 'category', 'template', 'published'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = News::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'visible' => $this->visible,
            'author' => $this->author,
            'position' => $this->position,
            'created' => $this->created,
            'modified' => $this->modified,
        ]);

        $query->andFilterWhere(['like', 'label', $this->label])
            ->andFilterWhere(['like', 'alias', $this->alias])
            ->andFilterWhere(['like', 'content', $this->content])
            ->andFilterWhere(['like', 'announce', $this->announce])
            ->andFilterWhere(['like', 'image_id', $this->image_id])
            ->andFilterWhere(['like', 'category', $this->category])
            ->andFilterWhere(['like', 'template', $this->template])
            ->andFilterWhere(['like', 'published', $this->published]);

        return $dataProvider;
    }
}
