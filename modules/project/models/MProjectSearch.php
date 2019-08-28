<?php

namespace app\modules\project\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\project\models\MProject;

/**
 * app\modules\project\models\MProjectSearch represents the model behind the search form about `app\modules\project\models\MProject`.
 */
 class MProjectSearch extends MProject
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'kode'], 'integer'],
            [['user', 'name', 'keterangan', 'updated_at', 'created_at', 'deleted', 'created_by', 'updated_by'], 'safe'],
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
        $query = MProject::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'kode' => $this->kode,
        ]);

        $query->andFilterWhere(['like', 'user', $this->user])
            ->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'keterangan', $this->keterangan])
            ->andFilterWhere(['like', 'updated_at', $this->updated_at])
            ->andFilterWhere(['like', 'created_at', $this->created_at])
            ->andFilterWhere(['like', 'deleted', $this->deleted])
            ->andFilterWhere(['like', 'created_by', $this->created_by])
            ->andFilterWhere(['like', 'updated_by', $this->updated_by]);

        return $dataProvider;
    }
}
